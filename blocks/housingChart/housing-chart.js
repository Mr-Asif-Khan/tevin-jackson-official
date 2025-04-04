document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-housing-chart-id]").forEach((element) => {
      const uniqueId = element.getAttribute("data-housing-chart-id");
      const rent = parseFloat(element.getAttribute("data-rent")) || 0;
      const own = parseFloat(element.getAttribute("data-own")) || 0;

      const ctx = document.getElementById(uniqueId);
      if (ctx) {
          if (Chart.getChart(ctx)) {
            Chart.getChart(ctx).destroy();
          }
          new Chart(ctx.getContext("2d"), {
              type: "bar",
              data: {
                  labels: ["Rent", "Own"],
                  datasets: [{
                      label: "Value",
                      data: [rent, own],
                      backgroundColor: ["#E67E22", "#5D9CEC"],
                      barThickness: 80,
                      borderRadius: 10
                  }]
              },
              options: {
                  indexAxis: "y",
                  responsive: true,
                  maintainAspectRatio: false,
                  plugins: {
                      legend: { display: false }
                  },
                  scales: {
                      y: {
                          categoryPercentage: 0.2,
                          barPercentage: 0.8,
                          ticks: {
                              color: "#000000",
                              font: {
                                  size: 16,
                                  weight: "200",
                                  family: "Outfit, sans-serif"
                              }
                          },
                          grid: { display: false }
                      },
                      x: {
                          ticks: {
                              color: "#000000",
                              font: {
                                  size: 16,
                                  weight: "200",
                                  family: "Outfit, sans-serif"
                              },
                              callback: function (value) {
                                  return value + "%";
                              }
                          }
                      }
                  }
              }
          });
      }
  });
});
