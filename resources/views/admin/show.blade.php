@extends('admin.master')

@section('main-content')
<h1>{{ $modelName }}</h1>
<table class="admin-table" style="width: 60%;">
    <tbody>
        @foreach($record as $key => $val)
            <tr class="admin-table__row">
                <td class="admin-table__head" style="width: 10%">{{ $key }}</td>
                <td class="admin-table__data">{{ $val }}</td>
            </tr>
        @endforeach
        <tr class="admin-table__row">
            <td class="admin-table__head">Actions:</td>
            <td class="admin-table__data action-links">


                <a id="edit-link" href="{{ $basePath }}/{{ $record['id'] }}/edit"> 
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit 
                </a>

                {{-- need to pass link --}}
                <form action="{{ $basePath }}/{{ $record['id'] }}"  method="POST" class="delete-link">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete 
                    </button>
                </form>
                    
            </td>
        </tr>
    </tbody>
</table>


@if (count($relationships['Orders']) && count($relationships['Addresses']) )
    
    @foreach ($relationships as $relationName => $rowsOfRelation)
        <h3 class="mt-5">{{ $relationName }}</h3>

      
       
        <table class="admin-table" >

            <thead class="admin-table__header">
        
                <tr class="admin-table__row">
                    <th class="admin-table__head">Id</th>

                    @php
                        $cols = Arr::except($rowsOfRelation[0]->getOriginal(), ['created_at', 'updated_at', 'id']);
                        
                    @endphp
                    @foreach ($cols as $col => $val)
                        <th class="admin-table__head">{{ ucfirst($col) }}</th>
                    @endforeach
                    
                    
                    <th class="admin-table__head">Actions</th>
                </tr>
            </thead>
        
        
        
            <tbody>
        
               
        
                @foreach ($rowsOfRelation as $record)
                @php
                    $columns = Arr::except($record->getOriginal(), ['created_at', 'updated_at', 'id']);
                @endphp

                    <tr class="admin-table__row">
        
                        <td class="admin-table__data" id="first-column">{{ $record->id }}</td>
        
                       
                            @foreach ($columns as $col => $val)
                                <td class="admin-table__data">{{ $val }}</td>
                            @endforeach
                        
                        
                        <td class="admin-table__data action-links">
                            @php
                                $routeName = strtolower($relationName) . ".show";
                                $url = route($routeName, [Str::singular(strtolower($relationName)) => $record->id]);
                                
                            @endphp
                            <a id="show-link" href="{{ $url }}"> 
                                <i class="fa fa-eye" aria-hidden="true"></i> View 
                            </a>        
                                
                        </td>
                        
                    </tr>
                @endforeach
        
            </tbody>
        
        
        </table>


    @endforeach


@endif

@endsection