/**
 * Dashboard Analytics
 */

'use strict';

let incomeChart; // Define chart variable outside the function scope
let config = {
    colors: {
      primary: '#696cff',
      secondary: '#8592a3',
      success: '#71dd37',
      info: '#03c3ec',
      warning: '#ffab00',
      danger: '#ff3e1d',
      dark: '#233446',
      black: '#000',
      white: '#fff',
      cardColor: '#fff',
      bodyBg: '#f5f5f9',
      bodyColor: '#697a8d',
      headingColor: '#566a7f',
      textMuted: '#a1acb8',
      borderColor: '#eceef1'
    }
  };
function viewChart(name, value) {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  const chartOrderStatistics = document.querySelector('#incomeChart1');

  // Destroy existing instance if it exists
  if (incomeChart) {
    incomeChart.destroy();
  }

  // Configuration for the new chart
  const orderChartConfig = {
    chart: {
      height: 250,
      type: 'bar',
      toolbar: {
        show: true
      }
    },
    series: [
      {
        name: 'Value',
        data: value // Update data according to your requirements
      }
    ],
    colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '50%',
        endingShape: 'rounded'
      }
    },
    dataLabels: {
      enabled: true,
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [headingColor]
      },
    },
    xaxis: {
      categories: name, // Update categories according to your requirements
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    yaxis: {
      title: {
        text: 'Percentage'
      },
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    grid: {
      borderColor: borderColor,
      strokeDashArray: 3,
      padding: {
        top: 0,
        bottom: 0,
        left: 10,
        right: 15
      }
    },
    legend: {
      show: false
    }
  };

  // Create new ApexCharts instance
  incomeChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
  incomeChart.render();
}

let statisticsChart; // Define chart variable outside the function scope

function viewEchangeChartFrom(name, value) {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  const chartOrderStatistics = document.querySelector('#orderStatisticsChart');

  // Destroy existing instance if it exists
  if (statisticsChart) {
    statisticsChart.destroy();
  }

  // Configuration for the new chart
  const orderChartConfig = {
    chart: {
      height: 250,
      type: 'bar',
      toolbar: {
        show: true
      }
    },
    series: [
      {
        name: 'Value',
        data: value // Update data according to your requirements
      }
    ],
    colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '50%',
        endingShape: 'rounded'
      }
    },
    dataLabels: {
      enabled: true,
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [headingColor]
      },
    },
    xaxis: {
      categories: name, // Update categories according to your requirements
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    yaxis: {
      title: {
        text: 'Percentage'
      },
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    grid: {
      borderColor: borderColor,
      strokeDashArray: 3,
      padding: {
        top: 0,
        bottom: 0,
        left: 10,
        right: 15
      }
    },
    legend: {
      show: false
    }
  };

  // Create new ApexCharts instance
  statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
  statisticsChart.render();
}


let statisticsChart1; // Define chart variable outside the function scope

function viewEchangeChartTo(name, value) {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  const chartOrderStatistics = document.querySelector('#orderStatisticsChart1');

  // Destroy existing instance if it exists
  if (statisticsChart1) {
    statisticsChart1.destroy();
  }

  // Configuration for the new chart
  const orderChartConfig = {
    chart: {
      height: 250,
      type: 'bar',
      toolbar: {
        show: true
      }
    },
    series: [
      {
        name: 'Value',
        data: value // Update data according to your requirements
      }
    ],
    colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '50%',
        endingShape: 'rounded'
      }
    },
    dataLabels: {
      enabled: true,
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [headingColor]
      },
    },
    xaxis: {
      categories: name, // Update categories according to your requirements
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    yaxis: {
      title: {
        text: 'Percentage'
      },
      labels: {
        style: {
          fontSize: '12px',
          colors: axisColor
        }
      }
    },
    grid: {
      borderColor: borderColor,
      strokeDashArray: 3,
      padding: {
        top: 0,
        bottom: 0,
        left: 10,
        right: 15
      }
    },
    legend: {
      show: false
    }
  };

  // Create new ApexCharts instance
  statisticsChart1 = new ApexCharts(chartOrderStatistics, orderChartConfig);
  statisticsChart1.render();
}
