@component('mail::message')
#Message Form {{ config('app.name') }}<br/>

<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Name: </td>
            <td><b><a href="#">{{$name}}</a></b></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><b><a href="#">{{$email}}</a></b></td>
        </tr>
        <tr>
            <td>Subject: </td>
            <td><b>{{$subject}}</b></td>
        </tr>
        <tr>
          <td>Message: </td>
          <td><b>{{$description}}</b></td>
      </tr>
    </tbody>
  </table>
Thank You.
@endcomponent
