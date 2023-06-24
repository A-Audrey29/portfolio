<?php

class Meow_MWL_Exif {

  static function gps2Num( $coordPart ) {
		$parts = explode( '/', $coordPart );
		if ( count( $parts ) <= 0 )
				return 0;
		if ( count( $parts ) == 1 )
				return $parts[0];
		return floatval( $parts[0] ) / floatval( $parts[1] );
	}

	static function convert_gps( $exifCoord, $hemi ) {
		$degrees = count( $exifCoord ) > 0 ? Meow_MWL_Exif::gps2Num( $exifCoord[0] ) : 0;
		$minutes = count( $exifCoord ) > 1 ? Meow_MWL_Exif::gps2Num( $exifCoord[1] ) : 0;
		$seconds = count( $exifCoord ) > 2 ? Meow_MWL_Exif::gps2Num( $exifCoord[2] ) : 0;
		$flip = ( $hemi == 'W' or $hemi == 'S' ) ? -1 : 1;
		return $flip * ( $degrees + $minutes / 60 + $seconds / 3600 );
	}

	static function get_gps_data( $id, &$meta ) {
    if ( isset( $meta['image_meta']['geo_coordinates'] ) ) {
      return $meta['image_meta']['geo_coordinates'];
    }
		$file = get_attached_file( $id );
		$pp = pathinfo( $file );
		if ( !in_array( strtolower( $pp['extension'] ), array( 'jpg', 'jpeg', 'tiff' ) ) )
			return;
		$exif = @exif_read_data( $file );
		if ( !$exif || !isset( $exif["GPSLongitude"] ) || !isset( $exif['GPSLongitudeRef'] )
			|| !isset( $exif["GPSLatitude"] ) || !isset( $exif['GPSLatitudeRef'] ) ) {
			$meta['image_meta']['geo_coordinates'] = "";
			wp_update_attachment_metadata( $id, $meta );
			return;
		}
		$meta['image_meta']['geo_latitude'] = Meow_MWL_Exif::convert_gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
		$meta['image_meta']['geo_longitude'] = Meow_MWL_Exif::convert_gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
		$meta['image_meta']['geo_coordinates'] = $meta['image_meta']['geo_latitude']
			. ',' . $meta['image_meta']['geo_longitude'];
		wp_update_attachment_metadata( $id, $meta );
	}

}

?>