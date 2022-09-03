<div>
    @if($status == 'instruction')
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Instruction
                </div>
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae voluptatibus quia dicta perferendis quibusdam? Sed consequuntur similique tenetur voluptas exercitationem quod dolorum quasi, consequatur neque, sit deserunt dolores quis reiciendis sunt incidunt accusamus error? Ab cupiditate qui sint a enim nihil, quod maxime dicta quas obcaecati aperiam doloremque sapiente nobis?
                    </p>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" class="btn btn-danger" wire:click="changeStatus('start')">Start</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($status == 'start')
    <p id="demo" class="mt-3 text-center"></p>
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Soal {{$priority}}/{{ $total_question }}
                </div>
                <div class="card-body">
                    <p>
                        {{ $question->body }}
                    </p>
                    <ul class="list-group list-group-flush">
                        @foreach(json_decode($question->answers) as $index => $answer)
                        <li class="list-group-item" wire:click="chooseOption({{$index}})" style="cursor: pointer;">
                            @if($my_selected === $index)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi text-primary bi-check-circle-fill mr-2" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle mr-2" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                            @endif
                            {{ $answer }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        @if($my_selected !== NULL)
                        <button class="btn btn-secondary" wire:click="nextQuestion">Next</button>
                        @else
                        <button class="btn btn-secondary" wire:click="nextQuestion" disabled>Next</button>
                        @endif
                    </div>
                </div>
                <ul style="display: flex;">
                    @foreach($allquestion as $item )
                    @if($item->priority < $priority) <li class="mr-2 " style="list-style: none;" style="cursor: pointer;"><a href="#" class="btn-outline-primary text-success" wire:click="changePriority({{$item->priority}})">{{ $item->priority}}</a></li>
                        @else
                        <li class="mr-2" style="list-style: none;" style="cursor: pointer;"><a href="#" class="btn-outline-primary" wire:click="changePriority({{$item->priority}})">{{ $item->priority}}</a></li>
                        @endif
                        @endforeach
                </ul>
            </div>
        </div>
    </div>
    @elseif($status == 'finish')
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Finish
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span>Jawaban Benar</span>
                            <span>{{ $correct }}</span>
                        </li>
                        <li class="list-group-item">
                            <span>Score</span>
                            <span>{{ ($correct * 100) / $total_question }}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{url('/quiz')}}" class="btn btn-warning">Ulangi Ujian</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h1>error</h1>
    @endif
</div>