<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
    <body>
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
                 Action
             </th></tr>
                   
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
                               
                        </td>

                       </tr>
                   @endforeach

               </tbody>
           </table>
        <a href="{{route("create")}}" class="pull-right btn btn-success">Add</a>
        </div>
    </body>
</html>
