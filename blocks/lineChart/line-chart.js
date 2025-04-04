document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-line-chart-id]").forEach((element) => {
    const uniqueId = element.getAttribute("data-line-chart-id");
    const data1Label = element.getAttribute("data-label1Name") || "Label 1";
    const data1JSON = element.getAttribute("data-label1DataJSON" || "[]");
    const data2Label = element.getAttribute("data-label2Name") || "Label 2";
    const data2JSON = element.getAttribute("data-label2DataJSON" || "[]");
    const data3Label = element.getAttribute("data-label2Name") || "Label 3";
    const data3JSON = element.getAttribute("data-label3DataJSON" || "[]");

    const data1 = JSON.parse(data1JSON)
    const data2 = JSON.parse(data2JSON)
    const data3 = JSON.parse(data3JSON)


    const ctx = document.getElementById(uniqueId);

    function convertDataFormat(data) {
      let formattedData = [];
      
      data.forEach(item => {
          let year = item.year;
          item.values.forEach((_, index) => {
              let month = String(index + 1).padStart(2, "0");
              formattedData.push(`${year}-${month}`);
          });
      });
  
      return formattedData;
    }

    function mergeAndRemoveDuplicates(...datasets) {
      let allLabels = [];
  
      datasets.forEach(dataset => {
          let convertedData = convertDataFormat(dataset);
          allLabels = allLabels.concat(convertedData);
      });
  
      let uniqueLabels = [...new Set(allLabels)].sort();
  
      return uniqueLabels;
    }
    const values1 = extractValues(data1);
    const values2 = extractValues(data2);
    const values3 = extractValues(data3);

    function extractValues(data) {
      let allValues = [];
      data.forEach(item => {
          allValues = allValues.concat(item.values);
      });
      return allValues;
    }

    if (ctx) {
      if (Chart.getChart(ctx)) {
        Chart.getChart(ctx).destroy();
      }
      const fivePointsData = [
        150000, 151200, 152500, 154000, 156000, 158500, 160000, 162000, 164500, 167000, 170000, 172500,
        175000, 176500, 178000, 180500, 182000, 184500, 187000, 190000, 192500, 195000, 198000, 200500,
        203000, 206000, 208500, 211000, 214000, 217500, 220000, 223500, 226000, 230000, 233500, 237000,
        240000, 243500, 246000, 250000, 253500, 257000, 260000, 263500, 267000, 270500, 274000, 278000,
        281500, 285000, 288500, 292000, 296000, 300000, 304000, 308000, 312500, 317000, 321500, 326000
      ];
  
      const elPasoData = [
        180000, 181000, 182500, 184000, 185500, 187500, 189500, 191500, 193500, 196000, 198500, 200500,
        203000, 205000, 207500, 210000, 212500, 215000, 218000, 221000, 224000, 227500, 230500, 234000,
        237000, 240500, 244000, 247500, 251000, 254500, 258000, 262000, 265500, 269500, 273500, 277500,
        281500, 285500, 289500, 293500, 297500, 301500, 305500, 309500, 313500, 318000, 322500, 327000,
        331500, 336000, 340500, 345000, 349500, 354000, 358500, 363500, 368000, 372500, 377000, 381500
      ];
  
      const usData = [
        400000, 402500, 405000, 408000, 411000, 414500, 418000, 421500, 425500, 429000, 432500, 436500,
        441000, 445500, 450000, 455000, 460000, 465500, 470500, 475500, 480500, 485500, 490500, 496000,
        501500, 507000, 512500, 518000, 523500, 529000, 534500, 540500, 546500, 552500, 558500, 564500,
        570500, 576500, 582500, 588500, 594500, 600500, 606500, 612500, 618500, 624500, 630500, 636500,
        642500, 648500, 654500, 660500, 666500, 672500, 678500, 684500, 690500, 696500, 702500, 708500
      ];
      const labels = mergeAndRemoveDuplicates(data1, data2, data3);
      // for (let year = 2021; year <= 2025; year++) {
      //     for (let month = 1; month <= 12; month++) {
      //         labels.push(`${year}-${month.toString().padStart(2, "0")}`);
      //     }
      // }
      new Chart(ctx.getContext("2d"), {
        type: "line",
        data: {
          labels: labels,
          datasets: [
            {
              label: data1Label,
              data: values1,
              borderColor: "#eb7100",
              backgroundColor: "transparent",
              borderWidth: 2,
              tension: 0.4,
              pointRadius: 0,
              pointHoverRadius: 8
            },
            {
              label: data2Label,
              data: values2,
              borderColor: "#5986f0",
              backgroundColor: "transparent",
              borderWidth: 2,
              borderDash: [10, 10],
              tension: 0.4,
              pointRadius: 0,
              pointHoverRadius: 0
            },
            {
              label: data3Label,
              data: values3,
              borderColor: "#b2b2b2",
              backgroundColor: "transparent",
              borderWidth: 2,
              borderDash: [10, 10],
              tension: 0.4,
              pointRadius: 0,
              pointHoverRadius: 0
            }
          ]
        },
        options: {
          responsive: true,
          interaction: {
            mode: "index",
            intersect: false,
            axis: 'x'
          },
          scales: {
            x: {
              type: "time",
              time: {
                unit: "year"
              },
              ticks: {
                source: "auto",
                color: "#000000",
                font: {
                    family: "Outfit",
                    size: 20,
                    weight: "200"
                },
              },
              grid: {
                display: false
              }
            },
            y: {
              position: "right",
              beginAtZero: false,
              ticks: {
                callback: function(value) {
                    return "$" + (value / 1000) + "K";
                },
                color: "#000000",
                font: {
                    family: "Outfit",
                    size: 20,
                    weight: "200"
                },
              },
              title: {
                display: true,
                text: "Average Price",
                color: "#000000",
                font: {
                    family: "Outfit", 
                    size: 20,
                    weight: "200"
                },
                padding: {bottom: 10 }
              }
            }
          },
          plugins: {
            tooltip: {
              enabled: false,
              external: function(context) {
                let tooltipEl = document.getElementById('chartjs-tooltip');

                if (!tooltipEl) {
                    tooltipEl = document.createElement('div');
                    tooltipEl.id = 'chartjs-tooltip';
                    tooltipEl.innerHTML = '<div class="tooltip-content"></div>';
                    document.body.appendChild(tooltipEl);
                }

                const tooltipModel = context.tooltip;
                if (tooltipModel.opacity === 0) {
                    tooltipEl.style.opacity = 0;
                    return;
                }

                let date = new Date(tooltipModel.title[0]);
                let month = date.toLocaleString("default", { month: "long" });
                let year = date.getFullYear();

                let innerHtml = `<div class="tooltip-title">${month} ${year}</div>`;

                tooltipModel.body.forEach((item, index)  => {
                    let datasetIndex = tooltipModel.dataPoints[index].datasetIndex; 
                    let dataset = context.chart.data.datasets[datasetIndex]; 
                    let borderColor = dataset.borderColor; 

                    let parts = item.lines[0].split(":");
                    let label = parts[0];
                    let value = parts[1].trim();

                    innerHtml += `<div class="tooltip-item">
                        <span class="tooltip-label">
                            <svg width="16" height="16" viewBox="0 0 20 20" class="legend-icon">
                                <circle cx="10" cy="10" r="6" fill="${borderColor}"></circle>
                            </svg> ${label}
                        </span>
                        <span class="tooltip-value">${value}</span>
                    </div>`;
                });

                let tooltipContent = tooltipEl.querySelector('.tooltip-content');
                tooltipContent.innerHTML = innerHtml;

                let position = context.chart.canvas.getBoundingClientRect();
                tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
                tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
                tooltipEl.style.opacity = 1;
                tooltipEl.style.pointerEvents = 'none';
              }
            },
            legend: {
              position: "bottom",
              labels: {
                color: "#000000",
                font: {
                  family: "Outfit",
                  size: 16,
                  weight: "200"
                }
              }
            }
          }
        }
      })
    }
  })
  
})

