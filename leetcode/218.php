class Solution {

    /**
     * @param Integer[][] $buildings
     * @return Integer[][]
     */
    function getSkyline($buildings) {
        $check_point = array();
        foreach($buildings as $row)
        {
            $check_point[] = $row[0];
            $check_point[] = $row[1];
            $check_point[] = $row[1] + 1;
        }
        
        $check_point = array_flip(array_flip($check_point));
        sort($check_point);

        $result_array = array();

        foreach($check_point as $key => $point)
        {
            $height = 0;
            foreach($buildings as $data)
            {                
                if ($point >= $data[0] && $point < $data[1] && $data[2] > $height)
                {
                    $height = $data[2];
                }                
            }
            $result_array[] = [$point, $height];
        }
        
        $height = 0;
        foreach($result_array as $key => $data)
        {
            if ($data[1] == $height)
            {
                unset($result_array[$key]);
            }
            else
            {
                $height = $data[1];
            }
        }
        
        return $result_array;
    }

}