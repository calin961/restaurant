<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body style="overflow: scroll;">
  <div class="container-scroller">
    @include("admin.navbar")
    
    <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name="name" required placeholder="Enter a name" style="color: blue;">
        </div>
        <div>
            <label for="">Speciality</label>
            <input type="text" name="speciality" required placeholder="Enter the speciality" style="color: blue;">
        </div>
        <div>
            <input type="file" name="image" required>
        </div>
        <div>
            <input type="submit" value="save" required style="color: blue;">
        </div>
    </form>

    <table bgcolor="black">
        <tr>
            <th style="padding: 30px;">Name</th>
            <th style="padding: 30px;">Speciality</th>
            <th style="padding: 30px;">Photo</th>
            <th style="padding: 30px;">Action</th>
            <th style="padding: 30px;">Action</th>
        </tr>   
        @foreach($data as $data)
        <tr align="center">
            <td>{{$data->name}}</td>
            <td>{{$data->speciality}}</td>
            <td><img src="/chefimage/{{$data->image}}" height="100" width="100"></td>
            <td><a href="{{url('/updatechef', $data->id)}}" class="">Update</a></td>
            <td><a href="{{url('/deletechef', $data->id)}}" class="">Delete</a></td>
        </tr>  
        @endforeach   
    </table>

  </div>
    @include("admin.adminscript")    
  </body>
  <footer></footer>
</html>