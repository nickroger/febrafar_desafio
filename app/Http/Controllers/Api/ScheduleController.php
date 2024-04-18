<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Schedules\CreateScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ScheduleController extends Controller
{
    public function __construct(
        protected ScheduleService $service
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/schedules",
     *     security={{"token": {}}},
     *     summary="List all Schedules",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="show result according to page",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int32"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="An paged array of schedules",
     *         @OA\Header(header="x-next", @OA\Schema(type="string"), description="A link to the next page of responses")
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *         @OA\Schema(ref="#/components/schemas/Error")
     *     )
     * )
     */
    public function index(Request $request)
    {
        $schedules = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 2),
        );

        return ApiAdapter::toJson($schedules);
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/schedules",
     *     security={{"token": {}}},
     *     summary="Create Schedule",
     *     tags={"Schedules"},
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="start_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="deadline_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="conclusion_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *     @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *     @OA\Parameter(
     *      name="id_user",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number"
     *      )
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="An paged array of schedules",
     *         @OA\Header(header="x-next", @OA\Schema(type="string"), description="A link to the next page of responses")
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *         @OA\Schema(ref="#/components/schemas/Error")
     *     )
     * )
     */
    public function store(StoreUpdateScheduleRequest $request)
    {
        $schedule = $this->service->new(
            CreateScheduleDTO::makeFromRequest($request)
        );
        return new ScheduleResource($schedule);
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/schedules/{id}",
     *     security={{"token": {}}},
     *     summary="List schedules based by ID",
     *     description="Returns a schedule based on a single ID",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         description="ID of schedule",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="schedule response",
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function show(string $id)
    {
        if (!$schedule = $this->service->findOne($id)) {
            return response()->json([
                'error' => "Not Found"
            ], Response::HTTP_NOT_FOUND);
        }
        return new ScheduleResource($schedule);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/schedules",
     *     security={{"token": {}}},
     *     summary="Update Schedule",
     *     tags={"Schedules"},
     *   @OA\Parameter(
     *      name="id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="start_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="deadline_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="conclusion_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date"
     *      )
     *   ),
     *     @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *     @OA\Parameter(
     *      name="id_user",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number"
     *      )
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="An paged array of schedules",
     *         @OA\Header(header="x-next", @OA\Schema(type="string"), description="A link to the next page of responses")
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *         @OA\Schema(ref="#/components/schemas/Error")
     *     )
     * )
     */
    public function update(StoreUpdateScheduleRequest $request, string $id)
    {
        if (!$schedule = $this->service->update(
            UpdateScheduleDTO::makeFromRequest($request, $id)
        )) {
            return response()->json([
                'error' => "Not Found"
            ], Response::HTTP_NOT_FOUND);
        }
        return new ScheduleResource($schedule);
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/schedules/{id}",
     *     security={{"token": {}}},
     *     summary="Delete schedule based by id",
     *     description="deletes a single schedule based on the ID",
     *     operationId="deletePet",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         description="ID of schedule to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="schedule deleted"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => "Not Found"
            ], Response::HTTP_NOT_FOUND);
        }
        $this->service->delete($id);

        return response()->json([
            'message' => 'Schedule deleted'
        ], Response::HTTP_NO_CONTENT);
    }
}
