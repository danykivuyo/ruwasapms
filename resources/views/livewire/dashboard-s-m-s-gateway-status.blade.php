<div class="card">
    <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        </ul>
    </div>

    <div class="card-body">
        <h5 class="card-title">SMS Gateway Status</h5>

        <div class="activity" wire:poll.1000ms="fetchStatus()">
            @foreach (collect($this->logs)->take(5) as $log)
                <div class="activity-item d-flex">
                    <div class="activite-label">
                        @php
                            $smsParts = explode('#', $log['sms']);
                            $meter_id = $smsParts[1];
                        @endphp

                        {{ $meter_id }}
                    </div>
                    <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                    <div class="activity-content">
                        {{ $log['date'] }} |

                        @php
                            $timeString = $log['time'];
                            $dateTime = DateTime::createFromFormat('H:i:s', $timeString);
                            $formattedTime = $dateTime->format('H:i');
                        @endphp
                        {{ $formattedTime }}
                    </div>
                </div><!-- End activity item-->
            @endforeach
        </div>
    </div>
</div>
