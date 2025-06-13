@include('admin.index')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Қатысушының прогресс шолуы</h3>

                <div class="overflow-x-auto mb-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Аты</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Электрондық пошта</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Соңғы аяқталған тапсырма (Сабақтар)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Курс атауы</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($participantsData as $participant)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $participant['id'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $participant['name'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $participant['email'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $participant['last_completed_task'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $participant['course'] ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h3 class="text-lg font-medium text-gray-900 mb-4">Қатысушының прогресс диаграммасы</h3>
                <div class="relative h-96">
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const participantsData = @json($participantsData);

    const labels = participantsData.map(participant => participant.name);
    const data = participantsData.map(participant => participant.last_completed_task || 0);

    const ctx = document.getElementById('progressChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Аяқталған сабақтар саны',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Соңғы аяқталған тапсырмалар'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Қатысушының аты-жөні'
                    }
                }
            }
        }
    });
</script>
