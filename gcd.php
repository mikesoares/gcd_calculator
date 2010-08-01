<?php

/*
	GCD (Greatest Common Divisor) Calculator
	Created by Michael Soares (mikesoares.com)

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
	---------------------------------------------------------------------
	
	USAGE: Upload this file to a PHP-capable server, browse to the full URL of the file,
	and add two parameters, a and b, to the end of the URL to specify which numbers
	you would like to find the GCD of.
	
	EXAMPLE: http://www.example.com/gcd.php?a=12&b=20 would give you the GCD of 12 and 20 (=4),
	as well as show you the steps used using Euclid's algorithm to obtain the final answer.
	
	OTHER NOTES:	x*b + y*a = r
					r is the remainder
					q is the quotient
					i is the iteration	
*/

$b = $_GET["b"];
$a = $_GET["a"];

if( isset($a) && isset($b) )
{
	$r = array($b,$a);
	$x = array(1,0);
	$y = array(0,1);
	$q = array(0);

	$i = 0;

	print("<table border=\"1\">");
	print("\n\t<tr>\n\t\t<td>i</td>\n\t\t<td>x</td>\n\t\t<td>y</td>\n\t\t<td>r</td>\n\t\t<td>q</td>\n\t</tr>");
	print("\n\t<tr>\n\t\t<td>" . $i . "</td>\n\t\t<td>" . $x[$i] . "</td>\n\t\t<td>" . $y[$i] . "</td>\n\t\t<td>" . $r[$i] . "</td>\n\t</tr>");

	$i = 1;
	while($r[$i] != 0)
	{
		$q[] = (int)($r[$i-1]/$r[$i]);
		$r[] = $r[$i-1]-$q[$i]*$r[$i];
		$x[] = $x[$i-1]-$q[$i]*$x[$i];
		$y[] = $y[$i-1]-$q[$i]*$y[$i];
		print("\n\t<tr>\n\t\t<td>" . $i . "</td>\n\t\t<td>" . $x[$i] . "</td>\n\t\t<td>" . $y[$i] . "</td>\n\t\t<td>" . $r[$i] . "</td>\n\t\t<td>" . $q[$i] . "</td>\n\t</tr>");
		$i++;
	}

	print("\n\t<tr>\n\t\t<td>" . $i . "</td>\n\t\t<td>" . $x[$i] . "</td>\n\t\t<td>" . $y[$i] . "</td>\n\t\t<td>" . $r[$i] . "</td>\n\t</tr>");

	print("\n</table>");
	print("\n<br />GCD is " . $r[$i-1] . ".");
}
else
{
	print("No input given.");
}

?>