document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-bar-chart-id]").forEach((element) => {
    const labels = ["$125K", "$145K", "$160K", "$175K", "$185K", "$205K", "$230K", "$255K", "$285K", "$335K", "$400K", "$490K", "$580K", "$690K", ">$690K"];

    const dataset1Label = element.getAttribute("data-label1Name") || "Label 1";
    const dataset1Values = element.getAttribute("data-label1Values") ? element.getAttribute("data-label1Values").split(",").map(Number) : [];
    const dataset2Label = element.getAttribute("data-label2Name") || "Label 2";
    const dataset2Values = element.getAttribute("data-label2Values") ? element.getAttribute("data-label2Values").split(",").map(Number) : [];
    const uniqueId = element.getAttribute("data-bar-chart-id");

    // const dataFivePoints = [2, 5, 12, 18, 10, 15, 20, 8, 5, 3, 1, 0.5, 0.3, 0.2, 0.1];
    // const dataElPaso = [3, 6, 10, 16, 12, 14, 18, 10, 7, 5, 3, 2, 1, 0.8, 0.5];

    const ctx = document.getElementById(uniqueId);
    if (ctx) {
      if (Chart.getChart(ctx)) {
        Chart.getChart(ctx).destroy();
      }
      new Chart(ctx.getContext("2d"), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: dataset1Label,
                    data: dataset1Values,
                    backgroundColor: "#E7761E",
                    barThickness: 25, 
                    borderRadius: 4
                },
                {
                    label: dataset2Label,
                    data: dataset2Values,
                    backgroundColor: "#D3D3D3",
                    barThickness: 25, 
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        usePointStyle: true,
                        pointStyle: "circle",
                        boxWidth: 8,
                        boxHeight: 8,
                        padding: 10,
                        font: {
                            family: 'Outfit',
                            weight: "200",
                            size: 18
                        },
                        color: "#000000",
                    }
                },
                tooltip: {
                    callbacks: {
                        title: (items) => `Home Value: ${items[0].label}`,
                        label: (item) => `${item.dataset.label}: ${item.raw}%`
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: "#000000",
                        font: {
                            family: 'Outfit',
                            weight: "200",
                            size: 20
                        },
                        maxRotation: 90,
                        minRotation: 90
                    }
                },
                y: {
                    position: 'right',
                    title: {
                      display: true,
                      text: "Market Share",
                      color: "#000000",
                      font: {
                        family: "Outfit", 
                        size: 20,
                        weight: "200"
                      },
                      padding: { top: 10, bottom: 10 }
                    },
                    ticks: {
                        beginAtZero: false,
                        stepSize: 5,
                        callback: (value) => `${value}%`,
                        color: "#000000",
                        font: {
                            family: 'Outfit',
                            weight: "200",
                            size: 20
                        }
                    }
                }
            }
        }
      });
    }
  });
});
