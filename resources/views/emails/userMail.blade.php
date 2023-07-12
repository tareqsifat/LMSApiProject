<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="card ">
                <div class="card-body text-center">
                    <div class="col-xl-6 col-lg-6 col-sm-6 m-auto">
                        <h3> Hello Mr/Mrs {{ ucfirst($data['name']) }} </h3>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ ucfirst($data['name']) }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data['phone'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <p class="mb-0"> Best Regards</p>
                        <p>1 Minutes School Autherity</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
