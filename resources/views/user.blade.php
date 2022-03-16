<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                @if($errors->any)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error )
                                <li style="color: darkred">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="exampleInputPassword1 " class="form-label">Тема</label>
                    <div class="input-group flex-nowrap ">
                        <input type="text" name="topic" class="form-control" placeholder="Тема">
                    </div>
                    <label for="exampleInputPassword1 " class="form-label">Сообщение</label>
                    <div class="form-floating">
                        <textarea name="text" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <label for="exampleInputPassword1 " class="form-label">Файил</label>
                    <div class="input-group flex-nowrap ">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="input-group flex-nowrap justify-content-center mt-3">
                        <button type="submit" class="btn btn-outline-success">добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
