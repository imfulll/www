// JavaScript Document
$(document).ready(function () {
  //graph========================================================
  const DATA_COUNT = 4;
  const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 100 };

  const data = {
    labels: ["2018", "2019", "2020", "2021"],
    datasets: [
      {
        label: "자산총계",
        data: [5232561, 6527055, 4429750, 5257874],
        backgroundColor: "#5FAD02",
      },
      {
        label: "부채총계",
        data: [3051266, 3816813, 1915427, 2265600],
        backgroundColor: "#FA420F",
      },
      {
        label: "자본총계",
        data: [2181295, 2710242, 2514323, 2992274],
        backgroundColor: "#2F4798",
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
              size: 15,
              family: "Noto Sans KR, sans-serif",
            },
          },
        },
      },
    },
  };

  const myChart = new Chart(document.getElementById("myChart1"), config);
});
