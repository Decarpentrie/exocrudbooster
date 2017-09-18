
@extends('crudbooster::admin_template')
@section('content')

<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th>type de logement</th>
        <th>adresse</th>
        <th>modalité</th>
        <th>prix</th>
        <th>superficie</th>
        <th>nombre d'étage</th>
        <th>nombre de pièce</th>
        <th>classe énergetique</th>
        <th>GES</th>
        <th>meubler</th>
        <th>emplacement véhicule</th>
        <th>description</th>
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
      <tr>
        <td>{{$row->adresse}}</td>
      <!--   <td>{{$row->description}}</td>
        <td>{{$row->price}}</td> -->
        <td>
   
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
          @endif
        </td>
       </tr>
    @endforeach
  </tbody>
</table>


<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
@endsection

