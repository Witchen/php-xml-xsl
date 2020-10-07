<?xml version="1.0"?>

<xsl:stylesheet version="1.0"
  xmlns:xsl= "http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" indent="yes"/>

  <xsl:template match="/PLANETS">
    <html>
      <head>
        <title>
          The Planets Table
        </title>
      </head>
      <body>
        <h1>
          The Planets Table
        </h1>
        <table>
          <tr>
            <td>Name</td>
            <td>Mass</td>
            <td>Radius</td>
            <td>Day</td>
          </tr>
          <xsl:apply-templates/>
        </table>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="PLANET">
    <tr>
      <td>
        <xsl:value-of select="NAME"/>
      </td>
      <td>
        <xsl:apply-templates select="MASS"/>
      </td>
      <td>
        <xsl:apply-templates select="RADIUS"/>
      </td>
      <td>
        <xsl:apply-templates select="DAY"/>
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="MASS">
    <xsl:value-of select="."/>
    <xsl:text></xsl:text>
    <xsl:value-of select="@UNITS"/>
  </xsl:template>

  <xsl:template match="RADIUS">
    <xsl:value-of select="."/>
    <xsl:text></xsl:text>
    <xsl:value-of select="@UNITS"/>
  </xsl:template>

  <xsl:template match="DAY">
    <xsl:value-of select="."/>
    <xsl:text></xsl:text>
    <xsl:value-of select="@UNITS"/>
  </xsl:template>

</xsl:stylesheet>