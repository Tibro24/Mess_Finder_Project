const areaEl = document.getElementById('area');
const minEl = document.getElementById('minRent');
const maxEl = document.getElementById('maxRent');
const resultsEl = document.getElementById('results');

document.getElementById('searchBtn').addEventListener('click', () => {
  const area = areaEl.options[areaEl.selectedIndex].text;
  const min = minEl.value.trim();
  const max = maxEl.value.trim();

  if (min && max && Number(min) > Number(max)) {
    resultsEl.textContent = 'Min rent should not be greater than max rent.';
    resultsEl.classList.add('show');
    return;
  }

  let summary = `Searching in ${area}`;
  if (min) summary += `, min ৳${min}`;
  if (max) summary += `, max ৳${max}`;
  if (!min && !max) summary += ' with no rent limit';

  resultsEl.textContent = summary;
  resultsEl.classList.add('show');
});

document.getElementById('clearBtn').addEventListener('click', () => {
  areaEl.selectedIndex = 0;
  minEl.value = '';
  maxEl.value = '';
  resultsEl.textContent = '';
  resultsEl.classList.remove('show');
});