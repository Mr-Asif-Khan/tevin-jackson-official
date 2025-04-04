document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-treemap-chart-id]").forEach((element) => {
      const uniqueId = element.getAttribute("data-treemap-chart-id");
      const dataJSON = element.getAttribute("data-datajson");

      if (!uniqueId || !dataJSON) return;

      const data = JSON.parse(dataJSON).map(item => ({
          ...item,
          capacityMW: parseFloat(item.capacityMW) || 0
      }));

      const ctx = document.getElementById(uniqueId);

      if (ctx) {
          if (Chart.getChart(ctx)) {
              Chart.getChart(ctx).destroy();
          }

          new Chart(ctx.getContext("2d"), {
              type: "treemap",
              data: {
                  datasets: [{
                      label: "TreeMap Dataset",
                      tree: data,
                      key: "capacityMW",
                      spacing: 2,
                      backgroundColor: (ctx) => ctx.raw?._data?.color || "rgba(0,0,0,0.5)",
                      labels: {
                          display: true,
                          formatter: (ctx) => {
                              let name = ctx.raw._data.name;
                              return name.length > 6 ? name.substring(0, 6) + "..." : name;
                          },
                          color: "white",
                          font: { size: 16, weight: "400", family: "Outfit, sans-serif" },
                          position: "bottom",
                          align: "left"
                      }
                  }]
              },
              options: {
                  plugins: {
                      title: { display: false},
                      legend: { display: false },
                      tooltip: {
                          callbacks: {
                              title: (items) => items[0].raw._data.name,
                              label: (item) => "Share: " + item.raw._data.capacityMW + "%"
                          }
                      }
                  }
              }
          });
          let legendContainer = document.getElementById(uniqueId + "_legend");
            if (!legendContainer) {
                legendContainer = document.createElement("div");
                legendContainer.id = uniqueId + "_legend";
                legendContainer.className = "treemap-legend";
                element.parentNode.appendChild(legendContainer);
            }

            legendContainer.innerHTML = data.map(item =>
                `<div style="display: inline-flex; align-items: center; margin: 5px;">
                    <span style="width: 12px; height: 12px; background: ${item.color}; display: inline-block; margin-right: 5px; border-radius: 50%;"></span>
                    <span>${item.name} (${item.capacityMW}%)</span>
                </div>`
            ).join('');
      }
  });
});
