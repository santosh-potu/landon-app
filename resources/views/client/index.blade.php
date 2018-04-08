@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Clients</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('new_client') }}">ADD NEW CLIENT</a></div>


        
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>

              <tr>
                <td>Mr. Roy Adams</td>
                <td>roy@email.com</td>
                <td>
                  <a class="hollow button" href="./clients_new.html">EDIT</a>
                  <a class="hollow button warning" href="./book_room.html">BOOK A ROOM</a>
                </td>
              </tr>

              <tr>
                <td>Mr. John Doe</td>
                <td>john@email.com</td>
                <td>
                  <a class="hollow button" href="./clients_new.html">EDIT</a>
                  <a class="hollow button warning" href="./book_room.html">BOOK A ROOM</a>
                </td>
              </tr>
                            <tr>
                <td>Ms. Jane Doe</td>
                <td>jane@email.com</td>
                <td>
                  <a class="hollow button" href="./clients_new.html">EDIT</a>
                  <a class="hollow button warning" href="./book_room.html">BOOK A ROOM</a>
                </td>
              </tr>
              
                      </tbody>
        </table>

        
      </div>
    </div>
@endsection