<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <table id="reportTable">
            <tr>
                <th>Product Name</th>
                <th>Amount</th>
                <th>Price @item</th>
                <th>Sold</th>
                <th>Sales Earning</th>
            </tr>
            <xsl:for-each select="items/tableItem">
                <tr>
                    <td><xsl:value-of select="product_name" /></td>
                    <td><xsl:value-of select="amount" /></td>
                    <td><xsl:value-of select="price" /></td>
                    <td><xsl:value-of select="sold" /></td>
                    <td><xsl:value-of select="earning" /></td>
                </tr>
            </xsl:for-each>
        </table>
    </xsl:template>
</xsl:stylesheet>