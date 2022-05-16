<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PlayerDataExportRequest;
use App\Http\Resources\ExporterCollectionResource;
use App\Services\Exporter\Interfaces\ExporterFactoryInterface;
use App\Services\Responses\JsonResponse;
use App\Services\Responses\XmlResponse;
use App\Services\Roster\Resources\RosterCriteriaResource;
use App\Services\Utilities\Interfaces\ParserInterface;
use Illuminate\Http\Response;

final class PlayerDataExporterController extends BaseApiController
{
    private ExporterFactoryInterface $exporterFactory;

    private ParserInterface $parser;

    public function __construct(ExporterFactoryInterface $exporterFactory, ParserInterface $parser)
    {
        $this->exporterFactory = $exporterFactory;
        $this->parser = $parser;
    }

    public function __invoke(PlayerDataExportRequest $request): Response
    {
        $type = $request->get('type');
        $driver = $this->exporterFactory->make($type);

        if ($driver === null) {
            $this->respondError('oops');
        }

        $rosterQueryResource = (new RosterCriteriaResource())
            ->setCountry($request->get('country'))
            ->setName($request->get('name'))
            ->setPlayerId($request->get('playerId'))
            ->setPosition($request->get('position'))
            ->setTeam($request->get('team'));

        $data = $driver->export($rosterQueryResource);

        if ($request->get('format') === 'xml') {
            $xml = $this->parser->parse((array) $data->response()->getData());

            return (new XmlResponse())->setContent($xml)->header('Content-Type', 'application/xml');
        }

        return (new JsonResponse())->setContent($data);
    }
}