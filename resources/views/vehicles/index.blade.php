<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <nav class="navbar md:navbar-expand bg-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Home</a>
            <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarDrawer"
                aria-controls="navbarDrawer" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>
            <dialog class="drawer drawer-end" tabindex="-1" id="navbarDrawer" aria-labelledby="navbarDrawerLabel">
                <div class="drawer-header">
                    <h5 class="drawer-title" id="navbarDrawerLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                </div>
                <div class="drawer-body mb-2 md:mb-0">
                    <ul class="nav navbar-nav me-auto">
                        <li class="nav-item mb-3">
                            <a class="nav-link active" href="{{ route('vehicles.index') }}">Vehicles</a>
                        </li>
                    </ul>
                    {{-- <form class="hstack gap-2" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn-solid btn-icon theme-secondary" type="submit">
                            <svg class="bi" width="16" height="16">
                                <use href="#search" />
                            </svg>
                        </button>
                    </form> --}}
                </div>
            </dialog>
        </div>
    </nav>

    <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog"
        data-bs-target="#staticBackdropDialog" data-bs-backdrop="static">
        Registrar cliente
    </button>


    <dialog class="dialog dialog-scrollable" id="staticBackdropDialog">
        <form action="{{ route('vehicles.store') }}" method="post">
            <div class="dialog-header">
                <h1 class="dialog-title">Ingrese los datos del Vehículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>

            <div class="dialog-body" style="max-height: 65vh; overflow-y: auto;">
                @csrf

                <div class="mb-3">
                    <label for="plate_number" class="form-label">Plate Number</label>
                    <input type="text" class="form-control" id="plate_number" name="plate_number" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand">
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>

                <div class="mb-3">
                    <label for="vehicle_type" class="form-label">Vehicle Type</label>
                    <input type="text" class="form-control" id="vehicle_type" name="vehicle_type">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="text" class="form-control" id="capacity" name="capacity">
                </div>

                <div class="mb-3">
                    <label for="daily_rate" class="form-label">Daily Rate</label>
                    <input type="text" step="0.01" class="form-control" id="daily_rate" name="daily_rate">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Estado</label>
                    <input type="text" step="0.01" class="form-control" id="status" name="status">
                </div>

            </div>

            <div class="dialog-footer">
                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                <button type="submit" class="btn-solid theme-primary">Save changes</button>
            </div>
        </form>
    </dialog>

    {{-- @if (@errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Plate Number</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Color</th>
                <th scope="col">Capacity</th>
                <th scope="col">Dayli Rate</th>
                <th scope="col">Status</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        @forelse($vehicles as $vehicle)
            <tbody>
                <tr>
                    <th scope="row">{{ $vehicle->id }}</th>
                    <td>{{ $vehicle->plate_number }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->vehicle_type }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->capacity }}</td>
                    <td>{{ $vehicle->daily_rate }}</td>
                    <td>{{ $vehicle->status }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn-solid theme-primary">Editar</button>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-solid theme-primary">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        @empty
            <tr>
                <td scope="8">No hay Registros</td>
            </tr>
        @endforelse
    </table>

</body>

</html>
