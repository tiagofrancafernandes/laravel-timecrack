<x-app-layout>
    <x-slot name="pageTitle">
        {{ __('Projects') }}
    </x-slot>

    <x-slot name="header">
        <a href="{{route('project.create')}}" class="btn btn-primary">
            {{__('Create')}}
        </a>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col">

                <form action="{{route('project.index')}}" class="mb-3">
                    @csrf
                    <div class="mb-3 d-flex justify-content-start align-items-center table-search-container">
                        <input type="text" id="q" name="q" class="form-control" value="{{$q}}"
                               placeholder="{{__('Search')}}" aria-label="{{__('Search')}}" autofocus>
                    </div>
                </form>

                <div class="table-responsive mb-3">
                    <table class="table table-sm small table-hover table-striped align-middle">
                        <thead>
                        <tr>
                            <th style="width: 30%">
                                {{__('Name')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Created')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Updated')}}
                            </th>
                            <th style="width: 30%">
                                {{__('Actions')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>
                                    {{$project->name}}
                                </td>
                                <td>
                                    {{$project->created_at->format('d.m.Y H:i')}}
                                </td>
                                <td>
                                    {{$project->updated_at->format('d.m.Y H:i')}}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{route('project.show', $project->id)}}"
                                           class="btn btn-outline-primary btn-sm">
                                            {{__('View')}}
                                        </a>
                                        <button type="button"
                                                class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split btn-sm"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">{{__('Toggle Dropdown')}}</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                   href="{{route('project.edit', $project->id)}}">
                                                    {{__('Edit')}}
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{route('project.destroy', $project->id)}}" method="POST"
                                                      onsubmit="return confirm('{{__('Are you sure that you want to delete this record?')}}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        {{__('Delete')}}
                                                    </button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    {{ $projects->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
