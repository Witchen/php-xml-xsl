<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <body>
        <div class="d-flex flex-wrap">
          <xsl:for-each select="items/item">

            <div class="item-card">
              <a class="item-card-url-wrapper" href="">
                <xsl:attribute name="href">
                  <xsl:value-of select="detail_url"/>
                </xsl:attribute>
                <img class="item-card-img-responsive">
                  <xsl:attribute name="src">
                    <xsl:value-of select="picurl"/>
                  </xsl:attribute>
                </img>
                <div class="item-card-title">
                  <xsl:value-of select="title"/>
                </div>
                <div class="d-flex align-items-end price-line">
                  <span>RM </span>
                  <span class="price">
                    <xsl:value-of select="price"/>
                  </span>
                </div>
                <div class="item-card-company-rating">
                  <span>
                    <xsl:value-of select="stars"/>
                  </span>
                  <span>
                    <xsl:value-of select="brand"/>
                  </span>
                </div>
              </a>
            </div>
          </xsl:for-each>
        </div>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>