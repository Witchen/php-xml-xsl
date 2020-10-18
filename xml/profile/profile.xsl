<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
    <xsl:template match="/">
        <html>
        <body>
            <div class="profileContainer">
                <div class="profileItemContainer">
                    <h5 style="margin-bottom:15px;text-align:center;">User Profile</h5>
                    <table id="profileTable">
                        <xsl:for-each select="profile/profileItem">
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
                <div class="profileItemContainer">
                    <h5 style="margin-bottom:15px;text-align:center;">Store Profile</h5>
                    <table id="profileTable">
                        <xsl:for-each select="profile/profileItem">
                            <tr>
                                <td class="profileTitle">Store Name</td>
                                <td><xsl:value-of select="storeName" /></td>
                            </tr>
                            <tr>
                                <td class="profileTitle">Location</td>
                                <td><xsl:value-of select="storeLocation" /></td>
                            </tr>
                            <tr>
                                <td class="profileTitle">Email</td>
                                <td><xsl:value-of select="storeEmail" /></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>
            </div>
        </body>
        </html>

    </xsl:template>
</xsl:stylesheet>