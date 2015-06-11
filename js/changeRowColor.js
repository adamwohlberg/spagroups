// JavaScript Document
function ChangeColor(tableRow, highLight)
{
  var backcolor = $(tableRow).attr("class");  
  if (highLight)
  {
	  tableRow.style.backgroundColor = '#ff68fd';
  }
  else
  {
	if (backcolor == 'odd')
	  {
		tableRow.style.backgroundColor = '#fdd5fd';
	  }
	  else
	  {
		tableRow.style.backgroundColor = 'white';
	  }
  }
}

function DoNav(theUrl)
{
document.location.href = theUrl;
}