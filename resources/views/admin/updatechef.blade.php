<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")

    <form action="{{url('/updatefoodchef', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Chef name</label>
            <input type="text" name="name" value="{{$data->name}}" style="color: blue;">
        </div>
        <div>
            <label for="">Chef speciality</label>
            <input type="text" name="speciality" value="{{$data->speciality}}" style="color: blue;">
        </div>
        <div>
            <label for="">Old image</label>
            <img src="/chefimage/{{$data->image}}" height="200" width="200" alt="">
        </div><div>
            <label for="">New image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" value="update chef" style="color:blue;">
        </div>
    </form>
  </div>
    @include("admin.adminscript")    
  </body>
</html>