    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    {{--<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>--}}
    <!-- Page level plugin JavaScript-->
    {{--<script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>--}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    {{--<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>--}}
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js')}}"></script>
    <script src="{{ asset('js/popImg.js')}}"></script>
    <!-- Custom scripts for this page-->
    {{--<script src="{{ asset('js/sb-admin-datatables.min.js')}}"></script>--}}
    {{--<script src="{{ asset('js/sb-admin-charts.min.js')}}"></script>--}}
{{----}}
{{--<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>--}}

{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}

{{--<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>--}}


        @yield('extra-js')
    </div>

    </body>

</html>