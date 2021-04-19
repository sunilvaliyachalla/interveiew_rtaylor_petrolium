<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
    <body>
        <div class="flex-center position-ref full-height">
        <form action="{{route("update",$user->id)}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input value="{{$user->name}}" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Age</label>
              <input value="{{$user->age}}" required type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Age" name="age">
                
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Language</label>
               <select name="languages[]" multiple>
                   <option value="">Please Choose languge</option>
                   @foreach ($languages as $item)
                   
               <option @if (in_array($item->id,$user_selected_language))
                       selected
               @endif value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
               </select>
                
              </div>


              <div class="form-group">
                <label  for="exampleInputEmail1">Gender</label>
               <select  required name="gender">
                   <option value="">Please Choose Gender</option>
                  
               <option  @if ($user->gender=="male")
                   selected
               @endif  value="male">Male</option>
               <option   @if ($user->gender=="female")
                selected
            @endif   value="female">Female</option>
                   
               </select>
                
              </div>


              
             
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </body>
</html>
