
@extends('layouts.app')

@section('content')


<div class="container-xxl py-5">
    <div class="container">
    <table class="table" style="margin-top: 5%;">
        <tr>
            <th>UserName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Create By</th>
        <!-- <th>Delete</th> -->
        </tr>
        @foreach ($contacts as $contact) 
            <tr>
                <td>
                    {{$contact["UserName"]}}
                </td>
                <td>
                    {{$contact["Email"]}}
                </td>
                <td>
                    {{$contact["Phone"]}}
                </td>
                <td>
                    {{$contact["Message"]}}
                </td>
                <td>
                    {{$contact["created_at"]}}
                </td>
   
                <!-- <td>
                <form method="post" action="{{ route('contactus.destroy', $contact->id) }}">
    @csrf
                                @method("delete")
    <button class="btn btn-danger" type="submit">Delete</button>
</form>
                 
                </td>  -->
            </tr>
        @endforeach
    </table>

    </div>
</div>
@endsection

