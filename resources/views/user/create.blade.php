<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
    <body>
        <div class="flex-center position-ref full-height">
        <form action="{{route("store")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Age" name="age">
                
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Language</label>
               <select name="language[]" multiple>
                   <option value="">Please Choose languge</option>
                   @foreach ($languages as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
               </select>
                
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
               <select name="gender">
                   <option value="">Please Choose Gender</option>
                  
               <option value="male">Male</option>
               <option value="female">Female</option>
                   
               </select>
                
              </div>


              
             
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </body>
</html>
