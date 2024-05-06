<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Project Manager</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .bg-gray-200 {
            background-color: #f7fafc;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .px-10 {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .py-5 {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .py-1\.5 {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
        }

        .text-[#FF2D20] {
            color: #FF2D20;
        }

        .font-bold {
            font-weight: 700;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #718096;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .gap-5 {
            gap: 1.25rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .bg-[#FF2D20] {
            background-color: #FF2D20;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .text-white {
            color: #ffffff;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .leading-5 {
            line-height: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="bg-gray-200 min-h-screen">
        <nav class="bg-white shadow-md px-10 py-5">
            <a href="{{ route('projects.index') }}" class="text-[#FF2D20] text-xl font-bold">Project Manager</a>
        </nav>
        <div class="px-10 py-5">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-4xl font-bold">Dashboard</h2>
                <a href="{{ route('projects.index') }}" class="bg-[#FF2D20] px-3 py-1.5 rounded-md  text-sm font-bold">View All Projects</a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach ($projects->take(3) as $project)
                    <div class="bg-white shadow-md p-5">
                        <h3 class="text-2xl font-bold mb-2">{{ $project->name }}</h3>
                        <p class="text-sm text-gray-600 mb-1">{{ $project->created_at->format('d M Y') }}</p>
                        <p class="font-bold text-xl">{{ $project->tasks->count() }} Tasks</p>
                        <a href="{{ route('projects.show', $project->id) }}" class="block bg-[#FF2D20] rounded-md py-2 px-3 text-white text-sm font-bold mt-2">View Project</a>
                    </div>
                @endforeach
            </div>
            <!-- Add the chart container -->
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Script section -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Example data (replace with your actual data)
        var data = {
          labels: ["{{ date('M') }}", "{{ date('M', strtotime('-1 month')) }}", "{{ date('M', strtotime('-2 month')) }}", "{{ date('M', strtotime('-3 month')) }}", "{{ date('M', strtotime('-4 month')) }}"],
            datasets: [{
                label: 'Projects',
                data: [{{ App\Models\Project::count() }}],
                
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Get the context of the canvas element we want to select
        var ctx = document.getElementById('myChart').getContext('2d');

        // Create the chart
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
