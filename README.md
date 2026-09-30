# CDN Utils for TYPO3


TYPO3 extension that trusts AWS CloudFront's published edge server IP ranges as reverse proxies, so TYPO3 resolves the real client IP from CloudFront's `X-Forwarded-*` headers instead of seeing CloudFront's own IP.

`mfd/cdn-utils` displays the client IP determined by TYPO3 and the `X-Forwarded-For` header directly in the backend. This makes it easy to check client IP detection when running TYPO3 behind a CDN or reverse proxy.

## Features

The extension adds two entries to the system information in the TYPO3 backend toolbar:

- **Client IP:** the client IP determined by TYPO3 based on its reverse proxy configuration.
- **X-Forwarded-For:** the chain of addresses from the header, separated by arrows. Displays `none` if the header is missing.

The extension only displays information. It does not change TYPO3's client IP detection or proxy configuration.


## Requirements

- PHP ^8.3
- TYPO3 ^13.0 || ^14.0

## Installation

```bash
composer require mfd/cdn-utils
```

After installation, the entries appear in the system information in the backend toolbar. No additional configuration is required.

## License

[GPL-2.0-or-later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)

## Maintainer

Maintained by [Marketing Factory Digital GmbH](https://www.marketing-factory.de), written by [Christian Spoo](https://www.marketing-factory.de/blog/autoren/christian-spoo/).
