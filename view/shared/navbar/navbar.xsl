<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <body>
        <div class="nav-scroller py-2 mb-2">
          <nav class="nav d-flex justify-content-around">
            <xsl:for-each select="navbar/nav">
              <a class="p-2 text-muted" href="">
                <xsl:attribute name="href">
                  <xsl:value-of select="url"/>
                </xsl:attribute>
                <xsl:value-of select="label"/>
              </a>
            </xsl:for-each>
          </nav>
        </div>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>