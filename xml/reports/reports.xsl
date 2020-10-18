<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <table id="reportTable">
            <tr>
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Sold</th>
                <th>Revenue</th>
            </tr>
            <xsl:for-each select="reports/tableItem">
                <tr>
                    <td><xsl:value-of select="category" /></td>
                    <td><xsl:value-of select="title" /></td>
                    <td><xsl:value-of select="stock" /></td>
                    <td><xsl:value-of select="price" /></td>
                    <td><xsl:value-of select="quantity" /></td>
                    <td><xsl:value-of select="revenue" /></td>
                </tr>
            </xsl:for-each>
        </table>
    </xsl:template>
</xsl:stylesheet>