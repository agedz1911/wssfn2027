<?php

namespace App\Livewire\Pages;

use App\Models\atGlance as ModelsAtGlance;
use App\Models\ScheduleSession;
use App\Models\Time;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Program at Glance - WSSFN 2027')]
class AtGlance extends Component
{
    public $atglances;

    public $duasembilan;
    public $tigapuluh;
    public $satu;
    public $dua;

    public $downloads;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->atglances = ScheduleSession::with('schedules')->get();

        $this->duasembilan = $this->atglances->where('date', '2027-09-29')->sortBy('no_urut');
        $this->tigapuluh = $this->atglances->where('date', '2027-09-30')->sortBy('no_urut');
        $this->satu = $this->atglances->where('date', '2027-10-1')->sortBy('no_urut');
        $this->dua = $this->atglances->where('date', '2027-10-2')->sortBy('no_urut');

        $this->downloads = \App\Models\DownloadSchedule::all();
    }

    private function scheduleDays(): array
    {
        $days = [
            ['date' => '2027-09-29', 'label' => '29 September', 'sessions' => $this->duasembilan],
            ['date' => '2027-09-30', 'label' => '30 September', 'sessions' => $this->tigapuluh],
            ['date' => '2027-10-1', 'label' => '1 October', 'sessions' => $this->satu],
            ['date' => '2027-10-2', 'label' => '2 October', 'sessions' => $this->dua],
        ];

        return array_map(function ($day) {
            $rooms = $day['sessions']
                ->map(fn($session) => filled($session->room) ? $session->room : 'Unassigned')
                ->unique()
                ->sort(fn($left, $right) => strnatcasecmp($left, $right))
                ->values();

            $timeSlots = $day['sessions']->groupBy('time')->map(function ($sessions, $time) use ($rooms) {
                return [
                    'time' => $time,
                    'rooms' => $rooms->map(fn($room) => [
                        'name' => $room,
                        'sessions' => $sessions
                            ->filter(fn($session) => (filled($session->room) ? $session->room : 'Unassigned') === $room)
                            ->values(),
                    ]),
                ];
            })->values();

            return [...$day, 'rooms' => $rooms, 'timeSlots' => $timeSlots];
        }, $days);
    }

    public function render()
    {
        return view('livewire.pages.at-glance', [
            'days' => $this->scheduleDays(),
        ]);
    }
}
