@extends('layout.main')

@section('content')

    <div>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel-body text-left">
                        <h4>Address</h4>
                        <div>
                            Sumy, Sums'ka oblast<br/>
                            Ukraine, 40000<br/>
                            +38(050) 123 45 67<br/>
                            service@company.com<br/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="panel-body text-justify">
                        <h4>About</h4>
                        <div>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                            In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                            pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.<br/>
                            Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
                            eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                            Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.
                            Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
                            Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
                            sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                            hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut
                            libero venenatis faucibus. Nullam quis ante.
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps?q={{$address}}&output=embed "></iframe>
            </div>
        </div>
    </div>
    </div>

@endsection