@extends('welcome')
@section('content')
<center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger fw-bold fs-4 mt-5 rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Record
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Product Deatils</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insertData" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <input type="text" placeholder="Enter Product Name" class="form-cntrol" name="pname" id="">
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Enter Product Price" class="form-cntrol" name="pprice" id="">
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Enter Product Status" class="form-cntrol" name="pstatus" id="">
            </div>
            <div class="mb-2">
                <input type="file"  class="form-cntrol" name="pimage" id="">
            </div>
            <button type="submit" class="btn btn-outline-danger  rounded-pill">Add Product</button>
        </form>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</center>
<div class="container"></div>
<table class="table mt-5">
    <thead class="bg-danger text-white fw-bold">
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Status</th>
        <th>Product Image</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody class="text-danger bg-light fs-5">
        @foreach($data as $item)
        <tr>
            <form action="updatedelete" method="get">
            <td class="pt-5"><input type="hidden" name="id" value="{{$item['ID']}}">{{$item['ID']}}</td>
            <td class="pt-5"><input type="hidden" name="name" value="{{$item['PName']}}">{{$item['PName']}}</td>
            <td class="pt-5"><input type="hidden" name="price" value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
            <td class="pt-5"><input type="hidden" name="status" value="{{$item['PStatus']}}">{{$item['PStatus']}}</td>
            <td class="pt-5"><img src="images/{{$item['PImage']}}" width="100px" height="100px" alt=""></td>
            <td class="pt-5"><input type="submit" class="btn btn-outline-danger rounded-pill" name="update" value="Update"></td>
            <td class="pt-5"><input type="submit" class="btn btn-outline-danger rounded-pill" value="Delete"></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection