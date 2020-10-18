<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <html>
            <body>
                <div class="buyerProfileContainer">
                    <div class="buyerProfileItemContainer">
                        <h5 style="margin-bottom:15px;">User Profile</h5>
                        <table id="profileTable">
                            <xsl:for-each select="buyerProfile/buyerProfileItem">
                                <tr>
                                    <td class="profileTitle">Full Name</td>
                                    <td><xsl:value-of select="full_name" /></td>
                                </tr>
                                <tr>
                                    <td class="profileTitle">username</td>
                                    <td><xsl:value-of select="username" /></td>
                                </tr>
                                <tr>
                                    <td class="profileTitle">Mobile Number</td>
                                    <td><xsl:value-of select="mobile_number" /></td>
                                </tr>
                                <tr>
                                    <td class="profileTitle">Email</td>
                                    <td><xsl:value-of select="email" /></td>
                                </tr>
                                <tr>
                                    <td class="profileTitle">Address</td>
                                    <td><xsl:value-of select="address" /></td>
                                </tr>
                                <tr>
                                    <td class="profileTitle">Role</td>
                                    <td><xsl:value-of select="role" /></td>
                                </tr>
                            </xsl:for-each>
                        </table>
                    </div>
                </div>
            </body>
        </html>

    </xsl:template>
</xsl:stylesheet>