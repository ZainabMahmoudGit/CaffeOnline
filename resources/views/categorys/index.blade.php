

<table class="table">
        <tr>
            <th>Category Name</th>
         
            <th>Delete</th>
        </tr>
        @foreach ($categorys as $category) 
            <tr>
               
                <td>
                    {{$category["CategoryName"]}}
                </td>
              
               
                <td>
                    {{-- method get post only in html --}}
                        <form method="post" action="{{route('categorys.destroy', $category['id'])}}">
                            @csrf
                            @method("delete") 
                            <button  class="btn btn-danger" type="submit">Delete</button>
                        </form>
               
                </td> 
            </tr>
        @endforeach
    </table>

    
