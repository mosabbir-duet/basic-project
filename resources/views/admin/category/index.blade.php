<x-app-layout>
    <x-slot name="header">

        <b class="text-xl">All Category</b>

    </x-slot>

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-8">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">Ok</button>
                    </div>
                    @endif
                    <div class="card">

                        <div class="card-header">
                            All Category
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($categories as $category)

                                <tr>
                                    <td scope="row">{{$categories->firstItem() + $loop->index}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <th>{{$category->userRelToCategory->name}}</th>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Add Card</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control rounded" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name">

                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-outline-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>