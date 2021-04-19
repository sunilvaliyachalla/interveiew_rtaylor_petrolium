<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
    <body>
        <div class="row"><div class="col-12">  <a href="{{route("create")}}" class="pull-right btn btn-success">Add</a></div></div>
        <div class="flex-center position-ref full-height">
           
           <table class="table table-striped">
               <thead>
                   <tr><th>
                    Name
                </th>

                <th>
                 Gender
             </th>
             <th>
                 Age
             </th>
             <th>
                 Languages
             </th>
             <th>
                Action
            </th>
            </tr>
                   
               </thead>
               <tbody>
                   @foreach ($users as $user)
                       <tr>
                           <td>
                            {{$user->name}}
                           </td>
                           <td>
                            {{$user->gender}}  
                        </td>
                        <td>
                            {{$user->age}}      
                        </td>
                        <td>
                             @foreach (@$user->UserLanguages??[] as $item)
                                 {{@$item->language->name}},
                             @endforeach  
                        </td>
                        <td>
                        <a href="{{route("edit",$user->id)}}">Edit</a>
                        <form action="{{route("delete",$user->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                       </tr>
                   @endforeach

               </tbody>
           </table>
      
        </div>
    </body>
</html>
