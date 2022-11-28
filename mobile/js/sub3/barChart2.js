// JavaScript Document
$(document).ready(function () {
  //graph========================================================
  const DATA_COUNT = 4;
  const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 100 };

  const data = {
    labels: ["2020"],
    datasets: [
      {
        label: "자산총계",
        data: [4429750],
        backgroundColor: "#5FAD02",
        barPercentage: 0.5,
      },
      {
        label: "부채총계",
        data: [1915427],
        backgroundColor: "#FA420F",
        barPercentage: 0.5,
      },
      {
        label: "자본총계",
        data: [2514323],
        backgroundColor: "#2F4798",
        barPercentage: 0.5,
      },
    ],
  };

  const config = {
    type: "bar",
    data: data,
    options: {
      interaction: {
        mode: "nearest",
      },
      responsive: true,
      plugins: {
        legend: {
          position: "top",
          labels: {
            font: {
              size: 12,
              family: "Noto Sans KR, sans-serif",
            },
          },
        },
      },
    },
  };

  const myChart = new Chart(document.getElementById("myChart2"), config);
});
