@component('mail::message')
#Your Message Replay Form {{ config('app.name') }}<br/>
Hello {{$name}}, Thanks for reaching us.
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Email</td>
            <td><b><a href="#">{{$email}}</a></b></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><b>{{$subject}}</b></td>
        </tr>
        <tr>
          <td>Body</td>
          <td><b>{{$description}}</b></td>
      </tr>
    </tbody>
  </table>
Thank You.
@endcomponent
