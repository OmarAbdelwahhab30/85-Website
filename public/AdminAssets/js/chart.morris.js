/*By       : Team 85:45*/
$(function(){
	
	/* Morris Area Chart */
	
	window.mA = Morris.Area({
	    element: 'morrisArea',
	    data: [
	        { y: '2019', a: 6000},
	        { y: '2020', a: 19000},
	        { y: '2021', a: 25000},
	        { y: '2022', a: 40000},
	    ],
	    xkey: 'y',
	    ykeys: ['a'],
	    labels: ['الأرباح'],
	    lineColors: ['#1b5a90'],
	    lineWidth: 2,
		
     	fillOpacity: 0.5,
	    gridTextSize: 10,
	    hideHover: 'auto',
	    resize: true,
		redraw: true
	});
	
	/* Morris Line Chart */
	
	window.mL = Morris.Line({
	    element: 'morrisLine',
	    data: [
	        { y: '2018', a: 12, b: 150},
	        { y: '2019', a: 20,  b: 400},
	        { y: '2020', a: 33,  b: 750},
	        { y: '2021', a: 50,  b: 900},
	        { y: '2022', a: 73,  b: 1500},
	    ],
	    xkey: 'y',
	    ykeys: ['a', 'b'],
	    labels: ['الملاعب', 'العملاء'],
	    lineColors: ['#1b5a90','#ff9d00'],
	    lineWidth: 1,
	    gridTextSize: 10,
	    hideHover: 'auto',
	    resize: true,
		redraw: true
	});
	$(window).on("resize", function(){
		mA.redraw();
		mL.redraw();
	});

});