<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Info About Member</title>
    {{-- <style>
@font-face {
font-family: 'Signika';
font-style: normal;
font-weight: 400;
src: url({{asset('public/fonts/Signika-Regular.ttf')}});
}
@font-face {
font-family: 'Signika';
font-style: normal;
font-weight: bold;
src: url({{ asset('public/fonts/Signika-Bold.ttf') }});
}
body {
font-family: 'Signika';
}
</style> --}}

<style>
/* @font-face {
font-family: 'Roboto';
font-style: normal;
font-weight: 400;
src: url({{ asset('public/fonts/Roboto-Regular.ttf') }});
}
@font-face {
font-family: 'Roboto';
font-style: normal;
font-weight: bold;
src: url({{ asset('public/fonts/Roboto-Bold.ttf') }});
} */
body {
font-family: DejaVu Sans;
}
</style>
</head>
<body>
    <h3>Info about member</h3>
    <hr>
    {{-- Horse: {{$member->membersHorse->name}} --}}
    <div class="form-group">
                                <small class="form-text text-muted"><b> Member's Name: </b>{{$member->name}}</small>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted"><b> Member's Surname: </b>{{$member->surname}}</small>
                            </div>

                            <div class="form-group">
                                <small class="form-text text-muted"><b> Member's Place of Residence:</b> {{$member->live}}</small>
                            </div>

                            <div class="form-group">
                                <small class="form-text text-muted" ><b> Member's Experience:</b> {{$member->experience}} </small>
                            </div>

                            <div class="form-group">
                                <small class="form-text text-muted" ><b> Member's Registered:</b> {{$member->registered}} </small>
                            </div>

                            <div class="form-group">
                                <small class="form-text text-muted" style="text-decoration: underline"><b> Reservoir:</b> {{$member->memberReservoirs->title}}</small>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted"><b> Reservoir Area:</b> {{$member->memberReservoirs->area}}</small>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted"><b> About Reservoir:</b> {!!$member->memberReservoirs->about!!}</small>
                            </div>

</body>
</html>