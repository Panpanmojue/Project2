function chooseCity(province,city) {
    let pr;
    let i,j;

    pr=province.value;
    city.length = 1;

    if (pr === 'default'){
        city.options[0] = new Option();
        city.options[0].text = '-Filter by Cities-';
        city.options[0].value = 'default';
        return;
    }

    if(typeof(cities[pr])=='undefined') return;

    for(i=0; i<cities[pr].length; i++)
    {
        j = i+1;
        city.options[j] = new Option();
        city.options[j].text = cities[pr][i];
        city.options[j].value = cities[pr][i];
    }
}