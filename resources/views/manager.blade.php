<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <h1>manager</h1>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">тема</th>
                        <th scope="col">сообщение</th>
                        <th scope="col">имя клиента</th>
                        <th scope="col">почта клиента</th>
                        <th scope="col">ссылка на файл</th>
                        <th scope="col">время создания</th>
                        <th scope="col">Статус</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $users as $users)
                       @if($users->rolls!="manager")
                        <tr>
                            <th scope="row">

                                @foreach($users->applications as $application)
                                    {{$application->id}}
                                @endforeach

                            </th>
                            <td>
                                @foreach($users->applications as $application)
                                    {{$application->topic}}
                                @endforeach</td>
                            <td>
                                @foreach($users->applications as $application)
                                     {{$application->text}}
                                @endforeach
                            </td>
                            <td>
                                    {{$users->name}}
                            </td>
                            <td>
                                {{$users->email}}
                            </td>
                            <td>
                                @foreach($users->applications as $application)
                                   <a href="/manager/{{$application->id}}">{{$application->file}}</a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($users->applications as $application)
                                    {{$application->created_at}}
                                @endforeach
                            </td>
                            <td>
                                @foreach($users->applications as $application)
                                    @if($application->status==1)
                                        <button type="submit" class="btn btn-success">Ответил</button>
                                    @endif

                                        @if($application->status==0)
                                         <a href="/manager/{{$application->id}}/edit">
                                             <button type="submit"  class="btn btn-danger">Не Ответил</button>
                                         </a>
                                        @endif
                                @endforeach
                            </td>
                        </tr>
                       @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
